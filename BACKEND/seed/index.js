//Models of the default || The Seed work for default values at the database
const { sequelize, municipio } = require('../src/models');

//Manage our promises with bluebird
const Promise = require('bluebird');
//Default JSON
const municipios = require('./municipios.json');

/* CONTROLADOR */
const MunicipioController = require('../src/controllers/municipioController');

//Init the seed with command node seed
sequelize.sync({ force: true }).then(async function() {
  await Promise.all(
    municipios.map(muni => {
      municipio.create(muni);
    }),
  ).then(function(one) {
    /* LIMPIEZA DE DATOS */
    let array_apoyo_trabajo_escuela = new Array();
    let array_cantidad_estudiantes = new Array();

    let contador_apoyo_trabajo_escuela = 0;
    let contador_cantidad_estudiantes = 0;

    let fs = require('fs');
    let parse = require('csv-parse');
    let async = require('async');

    //Archivos CSV
    let trabajoestudio = 'src/DATA/educacion/apoyotrabajoestudio.csv';
    let cantidadestudiantes = 'src/DATA/educacion/cantidadestudiantescs.csv';

    let scanner_trabajoestudio = parse({ delimiter: ',' }, function(err, data) {
      async.eachSeries(data, function(line, callback) {
        //console.log(line, contador_apoyo_trabajo_escuela);
        array_apoyo_trabajo_escuela.push(line);
        contador_apoyo_trabajo_escuela = contador_apoyo_trabajo_escuela + 1;
        if (contador_apoyo_trabajo_escuela === 200) {
          MunicipioController.aumentarApoyoTrabajoEscuela(
            array_apoyo_trabajo_escuela,
          );
        }
        callback();
      });
    });

    let scanner_cantidadesestudiantes = parse({ delimiter: ',' }, function(
      err,
      data,
    ) {
      async.eachSeries(data, function(line, callback) {
        //console.log(line, contador_apoyo_trabajo_escuela);
        array_cantidad_estudiantes.push(line);
        contador_cantidad_estudiantes = contador_cantidad_estudiantes + 1;
        if (contador_cantidad_estudiantes === 24) {
            MunicipioController.aumentarAlumnos(array_cantidad_estudiantes)
        }
        callback();
      });
    });

    fs.createReadStream(trabajoestudio).pipe(scanner_trabajoestudio);
    fs.createReadStream(cantidadestudiantes).pipe(
      scanner_cantidadesestudiantes,
    );
  });
});
