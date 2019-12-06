const { usuario } = require('../models');

function generateNewPin() {
  let verification_code = '';
  //4 digits pin
  for (let i = 0; i <= 3; i++) {
    verification_code += Math.floor(Math.random() * 10 + 1);
  }
  return parseInt(verification_code);
}

module.exports = {
  async updateAllPins(req, res) {
    try {
      await usuario
        .findAll()
        .then(function(users) {
          users.forEach(element => {
            element.update(
              {
                pin: generateNewPin(),
              },
              {
                where: {
                  usuario: element.username,
                },
              },
            );
          });
          res.send('DONE');
        })
        .catch(function(err) {
          console.log('Oops! something went wrong, : ', err);
        });
    } catch (err) {
      res.status(500).send({
        error: 'Error http/500 in pinController.updateAllPins',
      });
    }
  },
};
