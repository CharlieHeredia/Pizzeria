class administrador {
  constructor(id,nombre,usuario,password) {
    this._id = id;
    this._nombre = nombre;
    this._usuario = usuario;
    this._password = password;

  }

  get id(){
    return this._id;
  }
  set id(id){
    this._id = id;
  }
  get nombre(){
    return this._nombre;
  }
  set nombre(nombre){
    this._nombre = nombre;
  }
  get usuario(){
    return this._usuario;
  }
  set usuario(usuario){
    this._usuario = usuario;
  }
  get password(){
    return this._password;
  }
  set password(password){
    this._password = password;
  }
}
