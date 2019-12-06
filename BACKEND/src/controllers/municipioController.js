const { municipio } = require('../models');
let array_informacion = [0, 0, 0, 0];

function asyncFunction (item, cb) {
  setTimeout(() => {
    switch(item[6]){
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

module.exports = {
  aumentarApoyoTrabajoEscuela(arrayDatos) {
    let requests = arrayDatos.map((item) => {
      return new Promise((resolve) => {
        asyncFunction(item, resolve);
      });
  })
  
  Promise.all(requests).then(() => {
    municipio.update({
      apoyo_trabajo_escuela: array_informacion[0]
    },{
      where:{
        nombre: 'Othon P. Blanco'
      }
    })
    municipio.update({
      apoyo_trabajo_escuela: array_informacion[1]
    },{
      where:{
        nombre: 'Benito Juarez'
      }
    })
    municipio.update({
      apoyo_trabajo_escuela: array_informacion[2]
    },{
      where:{
        nombre: 'Solidaridad'
      }
    })
    municipio.update({
      apoyo_trabajo_escuela: array_informacion[3]
    },{
      where:{
        nombre: 'Bacalar'
      }
    })
  });
  },
};
