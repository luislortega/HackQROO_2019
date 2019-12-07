//Models of the default || The Seed work for default values at the database
const { sequelize, municipio } = require('../src/models');

//Manage our promises with bluebird
const Promise = require('bluebird');
//Default JSON
const municipios = require('./municipios.json');
const datosBachilleres = require('../src/DATA/educacion/datosbachillerestrimestral.json');
/* CONTROLADOR */
const MunicipioController = require('../src/controllers/municipioController');
const QuintanaRooController = require('../src/controllers/estadoController');

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
    let array_cantidadEmbarazosMenores15 = new Array();
    let array_cantidadEmbarazos15a19 = new Array();
    let array_cantidadEmbarazos20a24 = new Array();
    let array_cantidadEmbarazos25a29 = new Array();
    //Contadores
    let contador_apoyo_trabajo_escuela = 0;
    let contador_cantidad_estudiantes = 0;
    let contador_cantidadEmbarazosMenores15 = 0;
    let contador_cantidadEmbarazos15a19 = 0;
    let contador_cantidadEmbarazos20a24 = 0;
    let contador_cantidadEmbarazos25a29 = 0;

    let fs = require('fs');
    let parse = require('csv-parse');
    let async = require('async');

    //Archivos CSV
    let trabajoestudio = 'src/DATA/educacion/apoyotrabajoestudio.csv';
    let cantidadestudiantes = 'src/DATA/educacion/cantidadestudiantescs.csv';
    let cantidadEmbarazosMenores15 = 'src/DATA/salud/embarazoMenor15.csv';
    let cantidadEmbarazos15a19 = 'src/DATA/salud/embarazo15a19.csv';
    let cantidadEmbarazos20a24 = 'src/DATA/salud/embarazo20a24.csv';
    let cantidadEmbarazos25a29 = 'src/DATA/salud/embarazo25a29.csv';

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
          MunicipioController.aumentarAlumnos(array_cantidad_estudiantes);
        }
        callback();
      });
    });

    let scanner_embarazos_menores15 = parse({ delimiter: ',' }, function(
        err,
        data,
      ) {
        async.eachSeries(data, function(line, callback) {
          //console.log(line, contador_apoyo_trabajo_escuela);
          array_cantidadEmbarazosMenores15.push(line);
          contador_cantidadEmbarazosMenores15 = contador_cantidadEmbarazosMenores15 + 1;
          
          //Insercion en el estado
          if(contador_cantidadEmbarazosMenores15 === 1){
            let dataOrdenada = array_cantidadEmbarazosMenores15[0][2]+","+array_cantidadEmbarazosMenores15[0][3]+
                                ","+array_cantidadEmbarazosMenores15[0][4]+","+array_cantidadEmbarazosMenores15[0][5]+","+array_cantidadEmbarazosMenores15[0][6]+
                                ","+array_cantidadEmbarazosMenores15[0][7]+","+array_cantidadEmbarazosMenores15[0][8]

            QuintanaRooController.insertarEmbarazosMenores15(dataOrdenada)
          }
          if(contador_cantidadEmbarazosMenores15 === 12){
            MunicipioController.insertarEmbarazosMenores15(array_cantidadEmbarazosMenores15);
          }

          //console.log(line, contador_cantidadEmbarazosMenores15);
          callback();
        });
      });

    let scanner_embarazos_15a19 =  parse({ delimiter: ',' }, function(
        err,
        data,
      ) {
        async.eachSeries(data, function(line, callback) {
          //console.log(line, contador_apoyo_trabajo_escuela);
          array_cantidadEmbarazos15a19.push(line);
          contador_cantidadEmbarazos15a19 = contador_cantidadEmbarazos15a19 + 1;
          
          //Insercion en el estado
          if(contador_cantidadEmbarazos15a19 === 1){
            let dataOrdenada = array_cantidadEmbarazos15a19[0][2]+","+array_cantidadEmbarazos15a19[0][3]+
                                ","+array_cantidadEmbarazos15a19[0][4]+","+array_cantidadEmbarazos15a19[0][5]+","+array_cantidadEmbarazos15a19[0][6]+
                                ","+array_cantidadEmbarazos15a19[0][7]+","+array_cantidadEmbarazos15a19[0][8]

            QuintanaRooController.insertarEmbarazos15a19(dataOrdenada)
        
          }
          if(contador_cantidadEmbarazosMenores15 === 12){
            MunicipioController.insertarEmbarazos15a19(array_cantidadEmbarazos15a19);
          }
       

          //console.log(line, contador_cantidadEmbarazosMenores15);
          callback();
        });
      });

    let scanner_embarazos_20a24 =  parse({ delimiter: ',' }, function(
        err,
        data,
      ) {
        async.eachSeries(data, function(line, callback) {
          //console.log(line, contador_apoyo_trabajo_escuela);
          array_cantidadEmbarazos20a24.push(line);
          contador_cantidadEmbarazos20a24 = contador_cantidadEmbarazos20a24 + 1;
          
          //Insercion en el estado
          if(contador_cantidadEmbarazos20a24 === 1){
            let dataOrdenada = array_cantidadEmbarazos20a24[0][2]+","+array_cantidadEmbarazos20a24[0][3]+
                                ","+array_cantidadEmbarazos20a24[0][4]+","+array_cantidadEmbarazos20a24[0][5]+","+array_cantidadEmbarazos20a24[0][6]+
                                ","+array_cantidadEmbarazos20a24[0][7]+","+array_cantidadEmbarazos20a24[0][8]

            QuintanaRooController.insertarEmbarazos20a24(dataOrdenada)
        
          }
          
          if(contador_cantidadEmbarazos20a24 === 12){
            MunicipioController.insertarEmbarazos20a24(array_cantidadEmbarazos20a24);
          }
       

          //console.log(line, contador_cantidadEmbarazosMenores15);
          callback();
        });
      });
    
    let scanner_embarazos_25a29 = parse({ delimiter: ',' }, function(
        err,
        data,
      ) {
        async.eachSeries(data, function(line, callback) {
          //console.log(line, contador_apoyo_trabajo_escuela);
          array_cantidadEmbarazos25a29.push(line);
          contador_cantidadEmbarazos25a29 = contador_cantidadEmbarazos25a29 + 1;
          
          //Insercion en el estado
          if(contador_cantidadEmbarazos25a29 === 1){
            let dataOrdenada = array_cantidadEmbarazos25a29[0][2]+","+array_cantidadEmbarazos25a29[0][3]+
                                ","+array_cantidadEmbarazos25a29[0][4]+","+array_cantidadEmbarazos25a29[0][5]+","+array_cantidadEmbarazos25a29[0][6]+
                                ","+array_cantidadEmbarazos25a29[0][7]+","+array_cantidadEmbarazos25a29[0][8]

            QuintanaRooController.insertarEmbarazos25a29(dataOrdenada)
        
          }

          
          if(contador_cantidadEmbarazos25a29 === 12){
            MunicipioController.insertarEmbarazos25a29(array_cantidadEmbarazos25a29);
          } 
       

          //console.log(line, contador_cantidadEmbarazosMenores15);
          callback();
        });
      });
    
    fs.createReadStream(trabajoestudio).pipe(scanner_trabajoestudio);
    fs.createReadStream(cantidadestudiantes).pipe(
      scanner_cantidadesestudiantes,
    );
    fs.createReadStream(cantidadEmbarazosMenores15).pipe(scanner_embarazos_menores15)
    fs.createReadStream(cantidadEmbarazos15a19).pipe(scanner_embarazos_15a19)
    fs.createReadStream(cantidadEmbarazos20a24).pipe(scanner_embarazos_20a24)
    fs.createReadStream(cantidadEmbarazos25a29).pipe(scanner_embarazos_25a29)
    /* LECTURA JSON */
    let tasaAbsorcion =
      datosBachilleres['primer trimestre'][0]['Línea base'] +
      ',' +
      datosBachilleres['primer trimestre'][0][
        'Sentido del indicador (catálogo)'
      ];
    let porcentajeAprobacion =
      datosBachilleres['primer trimestre'][1]['Línea base'] +
      ',' +
      datosBachilleres['primer trimestre'][1][
        'Sentido del indicador (catálogo)'
      ];
    QuintanaRooController.insertarPorcentajeAbsorcionAprobacion(
      tasaAbsorcion,
      porcentajeAprobacion,
    );
  });
});
