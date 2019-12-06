// Fix the deprecated system
const Sequelize = require('sequelize');
const op = Sequelize.Op;

module.exports = {
  db: {
    database: process.env.DB_NAME || 'qdata',
    user: process.env.DB_USER || 'postgres',
    password: process.env.DB_PASS || '1298Luis',
    options: {  
      dialect: process.env.DIALECT || 'postgres',
      /*ssl: true,
      dialectOptions: {
        ssl: true
      },*/
      host: process.env.HOST || 'localhost',
      operatorsAliases: op.gt, //Fix the deprecated string based operator
    },
  },
  authentication: {
    jwtSecret: process.env.JWT_SECRET || 'secret',
  },
};
