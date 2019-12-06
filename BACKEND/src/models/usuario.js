const Promise = require('bluebird');
const bcrypt = Promise.promisifyAll(require('bcrypt-nodejs'));

//MD5 Password
function hashPassword(user, options) {
  const SALT_FACTOR = 8;
  let verification_code = '';

  if (!user.changed('senha')) {
    return;
  }

  //4 digits pin
  for (let i = 0; i <= 3; i++) {
    verification_code += Math.floor(Math.random() * 10 + 1);
  }

  //Encrypt
  return bcrypt
    .genSaltAsync(SALT_FACTOR)
    .then(salt => bcrypt.hashSync(user.senha, salt, null))
    .then(hash => {
      user.setDataValue('pin', verification_code);
      user.setDataValue('senha', hash);
    });
}

module.exports = (sequelize, DataTypes) => {
  const usuario = sequelize.define(
    'usuario',
    {
      id: {
        type: DataTypes.INTEGER,
        autoIncrement: true,
        primaryKey: true,
        unique: true,
      },
      usuario: {
        type: DataTypes.STRING,
        unique: true,
      },
      senha: DataTypes.STRING, //Encrypted
      vendedor: DataTypes.STRING,
      validade: DataTypes.STRING,
      pin: DataTypes.INTEGER,
      id_device: DataTypes.STRING,
      bootloader: DataTypes.STRING,
      board: DataTypes.STRING,
      brand: DataTypes.STRING,
      device: DataTypes.STRING,
      display: DataTypes.STRING,
      fingerprint: DataTypes.STRING,
      hardware: DataTypes.STRING,
      imei: DataTypes.STRING,
      host: DataTypes.STRING,
    },
    {
      hooks: {
        beforeSave: hashPassword,
      },
    },
  );

  //Comparacion de la password encriptada
  usuario.prototype.comparePassword = function(senha) {
    return bcrypt.compareSync(senha, this.senha);
  };

  return usuario;
};
