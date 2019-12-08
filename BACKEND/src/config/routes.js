//Controladores
const MunicipioController  = require('../controllers/municipioController.js');
const EstadoController = require('../controllers/estadoController');
module.exports = app => {
  app.get('/obtenerDatosMunicipios', MunicipioController.obtenerDatos);
  app.get('/obtenerDatosQuintanaRoo', EstadoController.obtenerDatos)
};
