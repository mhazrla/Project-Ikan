var express = require('express');
var app = express.Router();

//import database
var connection = require('../lib/db');

// GET Handler at Monitoring
app.get('/', function (req, res, next) {
    //query
    connection.query('SELECT * FROM monitoring ORDER BY id ASC', (err, data) => {
        if (err) {
            req.flash('error', err);
            res.render('posts', {
                data: ''
            });
        } else {
            //render ke view posts index
            res.render('posts/index', {
                data
            });
        }
    });

    
});


// POST Handler at Monitoring to Log Data-n
app.post('/', (req, res, next) => {

    let nama = req.body.nama;
    let errors  = false;

    
    if(!errors) {
        
        let data = {
            nama,
        }
        connection.query('INSERT INTO monitoring SET ?' , data, (err, res) => {
            if(err) {
                req.flash('error', err)

                // render to logData.ejs
                res.render('posts/logData', {
                    nama : data.nama,
                    waktu : data.waktu,  
                    nitrit : data.nitrit,
                    nitrat : data.nitrat,
                    amonia : data.amonia,
                    status : data.status,                  
                })
            }
        })
    }
})

// GET Handler at Log Data-n
app.get('/logData/(:id)', (req, res, next) => {
    let id = req.params.id;
    connection.query('SELECT * FROM logData WHERE id = ' + id, (err, rows, fields) => {
        if(err) throw err

        // If Aquarium ID Not Found
        if(rows.length <= 0){
            req.flash('error', 'Data Aquarium dengan id ' + id + ' tidak ditemukan')
            res.redirect('/posts')
        } 

        res.render('posts/logData', {
            id: rows[0].id,
            waktu: rows[0].waktu,
            nitrit: rows[0].nitrit,
            nitrat: rows[0].nitrat,
            amonia: rows[0].amonia,
            status: rows[0].status,
        })
    })
})


module.exports = app;