module.exports = (sequelize, DataTypes) => {
    const municipio = sequelize.define(
      'municipio',
      {
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
      },
    );
    return municipio    ;
  };
  