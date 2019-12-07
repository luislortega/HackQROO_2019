const { quintanaroo } = require('../models/');
module.exports = {
  insertarPorcentajeAbsorcionAprobacion(absorcion, aprobacion) {
    quintanaroo.create({
      porcentaje_absorcion: absorcion,
      porcentaje_aprobacion: aprobacion,
      posicion_actividad_economica_terciaria: 17,
    });
  },
  insertarEmbarazosMenores15(datos){
      quintanaroo.update({
        embarazos_menores_15: datos
      },{
          where: {
              id: 1
          }
      })
  },insertarEmbarazos15a19(datos){
    quintanaroo.update({
        embarazos_15a19: datos
      },{
          where: {
              id: 1
          }
      })
  }
};
