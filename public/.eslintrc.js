module.exports = {
  "env": {
    "browser": true,
    "node": true
  },
  "globals": {"fetch": false},
  "parser": "babel-eslint",
  "parserOptions": {
    "ecmaVersion": 6,
    "sourceType": "module",
    "ecmaFeatures": {
      "jsx": true,
      "modules": true,
      "experimentalObjectRestSpread": true
    }
  },
  "plugins": [
    "react"
  ],
  "extends": ["eslint:recommended", "plugin:react/recommended"],
  "rules": {
    "comma-dangle": 0,
    "react/jsx-uses-vars": 1,
    "react/prop-types": 0,
    "react/display-name": 1,
    "react/no-string-refs": 1,
    "react/jsx-no-undef": 1,
    "no-unused-vars": "warn",
    "no-console": 1,
    "no-unexpected-multiline": "warn"
  },
  "settings": {
    "react": {
      "pragma": "React",
      "version": "15.6.1"
    }
  }
};
