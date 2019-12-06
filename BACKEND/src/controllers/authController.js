const { usuario } = require('../models');
const jwt = require('jsonwebtoken');
const config = require('../config/config');
const moment = require('moment');

function tokenGenerator(user) {
  const ONE_WEEK = 60 * 60 * 24 * 7;
  return jwt.sign(user, config.authentication.jwtSecret, {
    expiresIn: ONE_WEEK,
  });
}

module.exports = {
  async register(req, res) {
    try {
      const user = await usuario.create(req.body);
      res.send({
        user: user.toJSON(),
        token: tokenGenerator(user.toJSON()),
      });
    } catch (err) {
      res.status(400).send({
        error: 'THE USER ALREADY EXIST',
      });
    }
  },
  async login(req, res) {
    try {
      const { usuarioo, senha, pin, id_device, bootloader, board, brand, device, display, fingerprint, hardware, imei, key } = req.body;

      const user = await usuario.findOne({
        where: {
          usuario: usuarioo,
        },
      });

      //Username verification
      if (!user) {
        return res.status(403).send({
          error: 'Username incorrect',
        });
      }

      //Password verification
      const isPasswordValid = await user.comparePassword(senha);
      if (!isPasswordValid) {
        return res.status(403).send({
          error: 'Password incorrect',
        });
      }
      //Pin verification
      if (pin != user.pin) {
        return res.status(403).send({
          error: 'Check your new pin psteam.herokuapp.com',
        });
      }
      /**
       *
       * NEW USER LOGIN and fingerprint and imei verification
       *
       */

      if (user.fingerprint === null || user.imei === null) {
        await usuario.update(
          {
            id_device: id_device,
            bootloader: bootloader,
            board: board,
            brand: brand,
            device: device,
            display: display,
            fingerprint: fingerprint,
            hardware: hardware,
            imei: imei,
          },
          {
            where: {
              usuario: usuarioo,
            },
          },
        );
      } else if (fingerprint != user.fingerprint || imei != user.imei) {
        return res.status(403).send({
          error: 'FINGERPRINT or IMEI incorrect',
        });
      }

      //------------------------------------------------------------------------------------------------

      //Expiration verification
      const now = moment()
        .format('YYYY-MM-DD')
        .toString()
        .split('-');
      const expiration = user.validade.split('-');

      if (now[0] === expiration[0] && now[1] === expiration[1]) {
        if (now[2] >= expiration[2]) {
          return res.status(403).send({
            error: 'Expired',
          });
        }
      } else if (now[0] > expiration[0] || now[1] > expiration[1]) {
        if (expiration[0] <= 2019) {
          return res.status(403).send({
            error: 'Expired',
          });
        }
      }

      //Key verification
      if (key !== '38d778e70ef5a85aeb526f7f19eed608') {
        return res.status(403).send({
          error: 'Please UPDATE mod menu',
        });
      }

      res.send({
        user: user.toJSON(),
        token: tokenGenerator(user.toJSON()),
      });
    } catch (err) {
      res.status(500).send({
        error: 'Error http/500 in authController.login',
      });
    }
  },
};
