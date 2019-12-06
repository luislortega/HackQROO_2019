const { usuario } = require('../models');

module.exports = {
  async updateDate(req, res) {
    try {
      const user = await usuario.update(
        {
          validade: req.body.new_validade,
        },
        {
          where: {
            usuario: req.body.usuarioo,
          },
        },
      );
      res.send(user);
    } catch (err) {
      res.status(500).send({
        error: 'Error http/500 in userController.updateDate',
      });
    }
  },
  async searchPin(req, res) {
    try {
      const user = await usuario.findOne({
        where: {
          usuario: req.body.usuarioo,
        },
      });
      res.send({
        pin: user.pin,
      });
    } catch (err) {
      res.status(500).send({
        error: 'Error http/500 in userController.searchPin',
      });
    }
  },
};
