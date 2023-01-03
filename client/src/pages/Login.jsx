import axios from "axios";
import React from "react";
import { useState } from "react";
import { useNavigate } from "react-router-dom";

const Add = () => {
  const [book, setBook] = useState({
    desc: "",
    price: "",
  });

  const navigate = useNavigate();

  const handleBookSubmit = async (e) => {
    e.preventDefault();
    try {
      axios.post("http://localhost:8800/books", book);
      navigate("/");
    } catch (error) {
      console.log("error->" + error);
    }
  };
  const handleChange = (e) => {
    setBook((prev) => ({ ...prev, [e.target.name]: e.target.value }));
  };

  console.log(book);

  return (
<body className="hold-transition login-page">
<div className="login-box">
  <div className="card card-outline card-primary">
    <div className="card-header text-center">
      <a href="../../index2.html" className="h1"><b>Health</b>Care</a>
    </div>
    <div className="card-body">
      <p className="login-box-msg">Sign in to start your session</p>
      <form action="../../index3.html" method="post">
        <div className="input-group mb-3">
          <input type="email" className="form-control" placeholder="Email" />
          <div className="input-group-append">
            <div className="input-group-text">
              <span className="fas fa-envelope" />
            </div>
          </div>
        </div>
        <div className="input-group mb-3">
          <input type="password" className="form-control" placeholder="Password" />
          <div className="input-group-append">
            <div className="input-group-text">
              <span className="fas fa-lock" />
            </div>
          </div>
        </div>
        <div className="row">
          <div className="col-8">
            <div className="icheck-primary">
              <input type="checkbox" id="remember" />
              <label htmlFor="remember">
                Remember Me
              </label>
            </div>
          </div>
          <div className="col-4">
            <button type="submit" className="btn btn-primary btn-block">Sign In</button>
          </div>
        </div>
      </form>
      <div className="social-auth-links text-center mt-2 mb-3">
        <a href="#" className="btn btn-block btn-primary">
          <i className="fab fa-facebook mr-2" /> Sign in using Facebook
        </a>
        <a href="#" className="btn btn-block btn-danger">
          <i className="fab fa-google-plus mr-2" /> Sign in using Google+
        </a>
      </div>
    </div>
  </div>
</div>
</body>
  );
};

export default Add;
