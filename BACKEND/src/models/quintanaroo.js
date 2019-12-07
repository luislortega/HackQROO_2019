module.exports = (sequelize, DataTypes) => {
  const quintanaroo = sequelize.define('quintanaroo', {
    id: {
      type: DataTypes.INTEGER,
      autoIncrement: true,
      primaryKey: true,
      unique: true,
    },
    porcentaje_absorcion: DataTypes.STRING,
    porcentaje_aprobacion: DataTypes.STRING,
    posicion_actividad_economica_terciaria: DataTypes.INTEGER,
  });
  return quintanaroo;
};
