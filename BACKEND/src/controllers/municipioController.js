const { municipio } = require('../models');
let array_informacion = [0, 0, 0, 0];
let array_informacion_alumnos = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
let array_informacion_embarazos_menores15 = new Array();
let array_informacion_embarazos_15a19 = new Array();
let array_informacion_embarazos_20a24 = new Array(); 

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

function asyncFunction3(item, cb) {
  setTimeout(() => {
    let data_limpia = item[2] + "," + item[3]+ "," + item[4]+ "," + item[5]+ "," + item[6]+ "," + item[7]+ "," + item[8];
    if(item[1] !== 'Quintana Roo'){
      array_informacion_embarazos_menores15.push(data_limpia);
    }
    cb();
  }, 100);
}


function asyncFunction4(item, cb) {
  setTimeout(() => {
    let data_limpia = item[2] + "," + item[3]+ "," + item[4]+ "," + item[5]+ "," + item[6]+ "," + item[7]+ "," + item[8];
    if(item[1] !== 'Quintana Roo'){
      array_informacion_embarazos_15a19.push(data_limpia);
    }
    cb();
  }, 100);
}

function asyncFunction5(item, cb) {
  setTimeout(() => {
    let data_limpia = item[2] + "," + item[3]+ "," + item[4]+ "," + item[5]+ "," + item[6]+ "," + item[7]+ "," + item[8];
    if(item[1] !== 'Quintana Roo'){
      array_informacion_embarazos_20a24.push(data_limpia);
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
  },insertarEmbarazosMenores15(arrayDatos){
    let requests = arrayDatos.map(item => {
      return new Promise(resolve => {
        asyncFunction3(item, resolve);
      });
    });
    Promise.all(requests).then(() => {
      municipio.update({
        embarazos_menores_15: array_informacion_embarazos_menores15[0]
      },{
        where:{
          nombre: 'Cozumel'
        }
      })

      municipio.update({
        embarazos_menores_15: array_informacion_embarazos_menores15[1]
      },{
        where:{
          nombre: 'Felipe Carrillo Puerto'
        }
      })

      municipio.update({
        embarazos_menores_15: array_informacion_embarazos_menores15[2]
      },{
        where:{
          nombre: 'Isla Mujeres'
        }
      })

      municipio.update({
        embarazos_menores_15: array_informacion_embarazos_menores15[3]
      },{
        where:{
          nombre: 'Othon P. Blanco'
        }
      })
  
      municipio.update({
        embarazos_menores_15: array_informacion_embarazos_menores15[4]
      },{
        where:{
          nombre: 'Benito Juarez'
        }
      })
  
      municipio.update({
        embarazos_menores_15: array_informacion_embarazos_menores15[5]
      },{
        where:{
          nombre: 'Jose Maria Morelos'
        }
      })
  
      municipio.update({
        embarazos_menores_15: array_informacion_embarazos_menores15[6]
      },{
        where:{
          nombre: 'Lazaro Cardenas'
        }
      })
  
      municipio.update({
        embarazos_menores_15: array_informacion_embarazos_menores15[7]
      },{
        where:{
          nombre: 'Solidaridad'
        }
      })
  
      municipio.update({
        embarazos_menores_15: array_informacion_embarazos_menores15[8]
      },{
        where:{
          nombre: 'Tulum'
        }
      })
  
      municipio.update({
        embarazos_menores_15: array_informacion_embarazos_menores15[9]
      },{
        where:{
          nombre: 'Bacalar'
        }
      })
  
      municipio.update({
        embarazos_menores_15: array_informacion_embarazos_menores15[10]
      },{
        where:{
          nombre: 'Puerto Morelos'
        }
      })
    })
  },insertarEmbarazos15a19(arrayDatos){
    let requests = arrayDatos.map(item => {
      return new Promise(resolve => {
        asyncFunction4(item, resolve);
      });
    });
    Promise.all(requests).then(() => {
      municipio.update({
        embarazos_15a19: array_informacion_embarazos_15a19[0]
      },{
        where:{
          nombre: 'Cozumel'
        }
      })

      municipio.update({
        embarazos_15a19: array_informacion_embarazos_15a19[1]
      },{
        where:{
          nombre: 'Felipe Carrillo Puerto'
        }
      })

      municipio.update({
        embarazos_15a19: array_informacion_embarazos_15a19[2]
      },{
        where:{
          nombre: 'Isla Mujeres'
        }
      })

      municipio.update({
        embarazos_15a19: array_informacion_embarazos_15a19[3]
      },{
        where:{
          nombre: 'Othon P. Blanco'
        }
      })
  
      municipio.update({
        embarazos_15a19: array_informacion_embarazos_15a19[4]
      },{
        where:{
          nombre: 'Benito Juarez'
        }
      })
  
      municipio.update({
        embarazos_15a19: array_informacion_embarazos_15a19[5]
      },{
        where:{
          nombre: 'Jose Maria Morelos'
        }
      })
  
      municipio.update({
        embarazos_15a19: array_informacion_embarazos_15a19[6]
      },{
        where:{
          nombre: 'Lazaro Cardenas'
        }
      })
  
      municipio.update({
        embarazos_15a19: array_informacion_embarazos_15a19[7]
      },{
        where:{
          nombre: 'Solidaridad'
        }
      })
  
      municipio.update({
        embarazos_15a19: array_informacion_embarazos_15a19[8]
      },{
        where:{
          nombre: 'Tulum'
        }
      })
  
      municipio.update({
        embarazos_15a19: array_informacion_embarazos_15a19[9]
      },{
        where:{
          nombre: 'Bacalar'
        }
      })
  
      municipio.update({
        embarazos_15a19: array_informacion_embarazos_15a19[10]
      },{
        where:{
          nombre: 'Puerto Morelos'
        }
      })
    })
  },insertarEmbarazos20a24(arrayDatos){
    let requests = arrayDatos.map(item => {
      return new Promise(resolve => {
        asyncFunction5(item, resolve);
      });
    });
    Promise.all(requests).then(() => {
      municipio.update({
        embarazos_20a24: array_informacion_embarazos_20a24[0]
      },{
        where:{
          nombre: 'Cozumel'
        }
      })

      municipio.update({
        embarazos_20a24: array_informacion_embarazos_20a24[1]
      },{
        where:{
          nombre: 'Felipe Carrillo Puerto'
        }
      })

      municipio.update({
        embarazos_20a24: array_informacion_embarazos_20a24[2]
      },{
        where:{
          nombre: 'Isla Mujeres'
        }
      })

      municipio.update({
        embarazos_20a24: array_informacion_embarazos_20a24[3]
      },{
        where:{
          nombre: 'Othon P. Blanco'
        }
      })
  
      municipio.update({
        embarazos_20a24: array_informacion_embarazos_20a24[4]
      },{
        where:{
          nombre: 'Benito Juarez'
        }
      })
  
      municipio.update({
        embarazos_20a24: array_informacion_embarazos_20a24[5]
      },{
        where:{
          nombre: 'Jose Maria Morelos'
        }
      })
  
      municipio.update({
        embarazos_20a24: array_informacion_embarazos_20a24[6]
      },{
        where:{
          nombre: 'Lazaro Cardenas'
        }
      })
  
      municipio.update({
        embarazos_20a24: array_informacion_embarazos_20a24[7]
      },{
        where:{
          nombre: 'Solidaridad'
        }
      })
  
      municipio.update({
        embarazos_20a24: array_informacion_embarazos_20a24[8]
      },{
        where:{
          nombre: 'Tulum'
        }
      })
  
      municipio.update({
        embarazos_20a24: array_informacion_embarazos_20a24[9]
      },{
        where:{
          nombre: 'Bacalar'
        }
      })
  
      municipio.update({
        embarazos_20a24: array_informacion_embarazos_20a24[10]
      },{
        where:{
          nombre: 'Puerto Morelos'
        }
      })
    })
  },
};
