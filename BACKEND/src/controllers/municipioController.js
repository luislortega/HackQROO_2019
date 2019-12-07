const { municipio } = require('../models');
let array_informacion = [0, 0, 0, 0];
let array_informacion_alumnos = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

function asyncFunction(item, cb) {
  setTimeout(() => {
    switch (item[6]) {
      case 'OTH�N P. BLANCO':
        array_informacion[0] += 1;
        break;
      case 'BENITO JUAREZ':
        array_informacion[1] += 1;
        break;
      case 'SOLIDARIDAD':
        array_informacion[2] += 1;
        break;
      case 'BACALAR':
        array_informacion[3] += 1;
        break;
    }
    cb();
  }, 100);
}

function asyncFunction2(item, cb) {
  setTimeout(() => {
    switch (item[2]) {
      case 'othon p. blanco':
        array_informacion_alumnos[0] += parseInt(item[1]);
        break;
      case 'jose ma. Morelos':
        array_informacion_alumnos[1] += parseInt(item[1]);
        break;
      case 'felipe carrillo puerto':
        array_informacion_alumnos[2] += parseInt(item[1]);
        break;
      case 'bacalar':
        array_informacion_alumnos[3] += parseInt(item[1]);
        break;
      case 'isla mujeres':
        array_informacion_alumnos[4] += parseInt(item[1]);
        break;
      case 'solidaridad':
        array_informacion_alumnos[5] += parseInt(item[1]);
        break;
      case 'benito juarez':
        array_informacion_alumnos[6] += parseInt(item[1]);
        break;
      case 'cozumel':
        array_informacion_alumnos[7] += parseInt(item[1]);
        break;
      case 'lazaro cardenas':
        array_informacion_alumnos[8] += parseInt(item[1]);
        break;
      case 'puerto morelos':
        array_informacion_alumnos[9] += parseInt(item[1]);
        break;
    }
    cb();
  }, 100);
}

module.exports = {
  aumentarApoyoTrabajoEscuela(arrayDatos) {
    let requests = arrayDatos.map(item => {
      return new Promise(resolve => {
        asyncFunction(item, resolve);
      });
    });
    Promise.all(requests).then(() => {
      municipio.update(
        {
          apoyo_trabajo_escuela: array_informacion[0],
        },
        {
          where: {
            nombre: 'Othon P. Blanco',
          },
        },
      );
      municipio.update(
        {
          apoyo_trabajo_escuela: array_informacion[1],
        },
        {
          where: {
            nombre: 'Benito Juarez',
          },
        },
      );
      municipio.update(
        {
          apoyo_trabajo_escuela: array_informacion[2],
        },
        {
          where: {
            nombre: 'Solidaridad',
          },
        },
      );
      municipio.update(
        {
          apoyo_trabajo_escuela: array_informacion[3],
        },
        {
          where: {
            nombre: 'Bacalar',
          },
        },
      );
    });
  },
  aumentarAlumnos(arrayDatos) {
    let requests = arrayDatos.map(item => {
      return new Promise(resolve => {
        asyncFunction2(item, resolve);
      });
    });
    Promise.all(requests).then(() => {
      municipio.update(
        {
          cantidad_estudiantes: array_informacion_alumnos[0] * 3,
        },
        {
          where: {
            nombre: 'Othon P. Blanco',
          },
        },
      );
      municipio.update(
        {
          cantidad_estudiantes: array_informacion_alumnos[1] * 3,
        },
        {
          where: {
            nombre: 'Jose Maria Morelos',
          },
        },
      );
      municipio.update(
        {
          cantidad_estudiantes: array_informacion_alumnos[2] * 3,
        },
        {
          where: {
            nombre: 'Felipe Carrillo Puerto',
          },
        },
      );
      municipio.update(
        {
          cantidad_estudiantes: array_informacion_alumnos[3] * 3,
        },
        {
          where: {
            nombre: 'Bacalar',
          },
        },
      );
      municipio.update(
        {
          cantidad_estudiantes: array_informacion_alumnos[4] * 3,
        },
        {
          where: {
            nombre: 'Isla Mujeres',
          },
        },
      );
      municipio.update(
        {
          cantidad_estudiantes: array_informacion_alumnos[5] * 3,
        },
        {
          where: {
            nombre: 'Solidaridad',
          },
        },
      );
      municipio.update(
        {
          cantidad_estudiantes: array_informacion_alumnos[6] * 3,
        },
        {
          where: {
            nombre: 'Benito Juarez',
          },
        },
      );
      municipio.update(
        {
          cantidad_estudiantes: array_informacion_alumnos[7] * 3,
        },
        {
          where: {
            nombre: 'Cozumel',
          },
        },
      );
      municipio.update(
        {
          cantidad_estudiantes: array_informacion_alumnos[8] * 3,
        },
        {
          where: {
            nombre: 'Lazaro Cardenas',
          },
        },
      );
      municipio.update(
        {
          cantidad_estudiantes: array_informacion_alumnos[9] * 3,
        },
        {
          where: {
            nombre: 'Puerto Morelos',
          },
        },
      );
    });
  },
};
