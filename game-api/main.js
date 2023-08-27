const mysql = require("mysql");
const axios = require("axios");

// Create a connection pool
const pool = mysql.createPool({
  host: "localhost",
  user: "admin",
  password: "52a6d848b3a02dec4792ba937d3a98f810a5b446af4da5d1",
  database: "xogos",
});
function convertToSeconds(time) {
  const [hours, minutes, seconds] = time.split(':').map(Number);
  const totalSeconds = (hours * 3600) + (minutes * 60) + seconds;
  return totalSeconds;
}

async function main() {
  // Example data from API
  const apiUrl = "https://lightninground.rocks/api";
  let totalCollectedCoins = await axios.get(apiUrl + "/totalCollectedCoins");
  const currentDate = new Date().toISOString().slice(0, 10);

  // Loop through the API data and insert/update the values in the database
  totalCollectedCoins.data.data.forEach((data) => {
    if (data.username != null) {
      // Check if the username already exists in the database
      const query = `SELECT * FROM gamedata WHERE username = '${data.username}' AND update_at='${currentDate}' AND game_id='lr'`;
      pool.query(query, (error, results) => {
        if (error) throw error;
        if (results.length > 0) {
          // If the username exists, update the value of coins
          const updateQuery = `UPDATE gamedata SET game_coins = ${data.coins} where id= ${results[0].id}`;
          pool.query(updateQuery, (error, results) => {
            if (error) throw error;
            console.log(`Updated ${data.username} with ${data.coins} coins`);
          });
        } 
        else {
          // If the username does not exist, insert a new row with the username and coins
          const insertQuery = `INSERT INTO gamedata (username, game_id, game_coins, update_at) VALUES ('${data.username}','lr', ${data.coins}, '${currentDate}')`;
          pool.query(insertQuery, (error, results) => {
            if (error) throw error;
            console.log(`Inserted ${data.username} with ${data.coins} coins`);
          });
        }
      });
    }
  });

  let timeGamgePlayed = await axios.get(apiUrl + "/timeGamgePlayed");
  timeGamgePlayed.data.data.forEach((data) => {
    // Check if the username already exists in the database
    if (data.username != null) {
      const query = `SELECT * FROM gamedata WHERE username = '${data.username}' AND update_at='${currentDate}' AND game_id='lr'`;
      pool.query(query, (error, results) => {
        if (error) throw error;
        if (results.length > 0) {
          // If the username exists, update the value of coins
          const updateQuery = `UPDATE gamedata SET game_time = ? WHERE id = ?`;
          pool.query(
            updateQuery,
            [convertToSeconds(data.game_time), results[0].id],
            (error, results) => {
              if (error) throw error;
              console.log(
                `Updated ${data.username} with ${data.game_time} times`
              );
            }
          );
        } else {
          // If the username does not exist, insert a new row with the username and coins
          const insertQuery = `INSERT INTO gamedata (username, game_id, game_time, update_at) VALUES ('${data.username}','lr', ${convertToSeconds(data.game_time)}, '${currentDate}')`;
          pool.query(insertQuery, (error, results) => {
            if (error) throw error;
            console.log(
              `Inserted ${data.username} with ${data.game_time} times`
            );
          });
        }
      });
    }
  });
}

setInterval(main, 5000);
