module.exports = (sequelize, DataTypes) => {
    const quintanaroo = sequelize.define(
      'quintanaroo',
      {
        id: {
          type: DataTypes.INTEGER,
          autoIncrement: true,
          primaryKey: true,
          unique: true,
        },
        porcentaje_aprobacion_esolar: DataTypes.STRING,
        porcentaje_acaban_prepa: DataTypes.STRING,
      },
    );
    return quintanaroo;
  };
  