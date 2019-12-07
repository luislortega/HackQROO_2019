module.exports = (sequelize, DataTypes) => {
  const municipio = sequelize.define('municipio', {
    id: {
      type: DataTypes.INTEGER,
      autoIncrement: true,
      primaryKey: true,
      unique: true,
    },
    nombre: DataTypes.STRING,
    lat: DataTypes.STRING,
    long: DataTypes.STRING,
    apoyo_trabajo_escuela: DataTypes.INTEGER,
    cantidad_estudiantes: DataTypes.INTEGER,
    embarazos_menores_15: DataTypes.STRING,
    embarazos_15a19: DataTypes.STRING,
    embarazos_20a24: DataTypes.STRING,
    embarazos_25a29: DataTypes.STRING
  });
  return municipio;
};
