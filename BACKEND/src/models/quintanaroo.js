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
    embarazos_menores_15: DataTypes.STRING,
    embarazos_15a19: DataTypes.STRING,
    embarazos_20a24: DataTypes.STRING,
    embarazos_25a29: DataTypes.STRING,
    anexados_menores20: DataTypes.STRING,
    confianzaPolicia: DataTypes.STRING,
    confianzaFamilia: DataTypes.STRING,
    confianzaPoliticos: DataTypes.STRING,
    confianzaSegurosPublicos: DataTypes.STRING
  });
  return quintanaroo;
};
