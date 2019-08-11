module.exports = {
  env: {
    browser: true,
    commonjs: true,
    es6: true,
    jquery: true
  },
  extends: [
    'plugin:vue/essential',
    'standard'
  ],
  globals: {
    Atomics: 'readonly',
    SharedArrayBuffer: 'readonly'
  },
  parserOptions: {
    ecmaVersion: 2019,
    sourceType: 'module'
  },
  plugins: [
    'vue'
  ],
  rules: {
    //
  }
}
