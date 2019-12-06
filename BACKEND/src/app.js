//Requires
const express = require('express');
const bodyParser = require('body-parser');
const cors = require('cors');
const morgan = require('morgan');
const { sequelize } = require('./models');

//PORT
const port = process.env.PORT || 5000;
//Express
const app = express();
app.use(morgan('combined'));
app.use(bodyParser.json());
app.use(cors());
//CSV SCANNER
var fs = require('fs');
var parse = require('csv-parse');
var async = require('async');

var inputFile='src/DATA/educacion/apoyotrabajoestudio.csv';

var parser = parse({delimiter: ','}, function (err, data) {
  async.eachSeries(data, function (line, callback) {
    // do something with the line
      // when processing finishes invoke the callback to move to the next one
      console.log(line)
      callback();
  })
});
fs.createReadStream(inputFile).pipe(parser);
//Routes
require('./config/routes')(app);
//Sequelize sync
sequelize.sync({ force: false }).then(() => {
  app.listen(port, () => {
    console.log(`👽 Backend corriendo en el puerto '${port}'  `);
  });
});
