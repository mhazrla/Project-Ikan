const express = require('express');
const connection = require('./lib/db');
const app = express();
const port = 3000
const db = require('./lib/db')
const http = require('http').createServer(app)
var io = require('socket.io')(http)

const bodyParser = require('body-parser')
const methodOverride = require('method-override')  // 17

const session = require('express-session')
const cookieParser = require('cookie-parser')
const flash = require('connect-flash') // 12
app.use("/static", express.static(__dirname + "/static"))
// use ejs view engine
app.set('view engine', 'ejs')

// Konfigurasi flash
app.use(cookieParser('secret'))
app.use(
    session({
        cookie: {maxAge:6000},
        secret: 'secret',
        resave: true,
        saveUninitialized: true
    })
)
app.use(flash()); // 12

app.use(bodyParser.urlencoded())
app.use(bodyParser.json())


connection.connect(err => {
    if(err) throw err;
    console.log('Koneksi berhasil')

    app.get('/', (req, res) => {
        connection.query('SELECT * FROM monitoring ORDER BY nama ASC', (err, data) => {
            if (err) {
                req.flash('error', err);
                res.render('index', {
                    data: '',
                });
            } else {
                //render ke view posts index
                res.render('index', {
                    data,
                });
            }
        });
    })

    // app.post('/add', (req, res) => {
    //     connection.query('INSERT INTO logdata (id, nama, waktu, nitrit, nitrat, amonia, status) SELECT * FROM monitoring', (err, data) => {
    //         res.render('/')
    //     })
    // })


    app.get('/logData/:id', (req, res) => {
        let id = req.params.id
        
        connection.query("SELECT * FROM monitoring WHERE id="+id, (err, data) => {
            if (err) {
                req.flash('error', err);
                res.render('logData', {
                    data: '',
                });
            } else {
                // render view logdata.ejs
                res.render('logData', {
                    data,
                });
            }
        })
    })

    app.post('/add', (req, res) => {
        // let nama = req.body.nama;
        // let errors  = false;
        
        connection.query('INSERT INTO monitoring SET ?' , req.body, (err, results) => {
            res.send("Berhasil ditambahkan")
        })
    })

    io.on('connection', socket => {
        console.log('user connected')
    })
    
    http.listen(port, () => {
        console.log(`Connected to http://localhost:${port}`)
    })

})

