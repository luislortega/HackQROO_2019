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
  },insertarEmbarazos20a24(datos){
    quintanaroo.update({
        embarazos_20a24: datos
      },{
          where: {
              id: 1
          }
      })
  },insertarEmbarazos25a29(datos){
    quintanaroo.update({
        embarazos_25a29: datos,
        anexados_menores20: '10959,11800,22759',
      },{
          where: {
              id: 1
          }
      })
  }, actualizarConfianzaFamilia(dato){
      quintanaroo.update({
        confianzaFamilia: dato
      },{
          where:{
              id: 1
          }
      })
  },actualizarConfianzaHospitales(dato){
      quintanaroo.update({
        confianzaSegurosPublicos: dato
      },{
          where:{
              id: 1
          }
      })

  }, actualizarConfianzaGobiernoMunicipal(dato){
    quintanaroo.update({
        confianzaPoliticos: dato
      },{
          where:{
              id: 1
          }
      })

  }, actualizarConfianzaPolicia(dato){
    quintanaroo.update({
        confianzaPolicia: dato
      },{
          where:{
              id: 1
          }
      })
  },async obtenerDatos(req, res){
    //obtener datos
    try{
      let array_estado = null;
      array_estado = await quintanaroo.findAll();
      res.send(array_estado);
    }catch(err){
        res.send("Error");
    }
}
};
