const { quintanaroo } = require('../models/');
module.exports = {
  insertarPorcentajeAbsorcionAprobacion(absorcion, aprobacion) {
    quintanaroo.create({
      porcentaje_absorcion: absorcion,
      porcentaje_aprobacion: aprobacion,
      posicion_actividad_economica_terciaria: 17,
    });
  },
};
