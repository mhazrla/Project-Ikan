const mysql = require('mysql');

const connection = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'ikan'
});

connection.connect(err => {
    if (err) {
        console.log(err);
    }

    let monitoring = 'monitoring'
    let logData = 'logData'

    const sql1 = `CREATE TABLE IF NOT EXISTS ${monitoring}(
        id int primary key auto_increment,
        nama varchar(255)not null,
        waktu varchar(255),
        nitrit varchar(25),
        nitrat varchar(25),
        amonia varchar(25),
        status varchar(255)
    )`;

    const sql2 = `CREATE TABLE IF NOT EXISTS ${logData}(
        id int primary key auto_increment,
        nama varchar(255)not null,
        waktu varchar(255),
        nitrit varchar(25),
        nitrat varchar(25),
        amonia varchar(25),
        status varchar(255)
    )`;

    connection.query(sql1, sql2, (err, result) => {
        if (err) throw err;
        console.log('Connection success')
    })

})

module.exports = connection;