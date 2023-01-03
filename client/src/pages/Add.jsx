import axios from "axios";
import React from "react";
import { useState } from "react";
import { useNavigate } from "react-router-dom";

const Add = () => {
  const [book, setBook] = useState({
    full_name: "",
    email: "",
    password: "",
    status: "",
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
    <div className="form">
      <h1>Add New Book</h1>
      <input
        type="text"
        placeholder="Enter Full Name"
        onChange={handleChange}
        name="full_name"
      />
      <input
        type="text"
        placeholder="Enter Email ID"
        onChange={handleChange}
        name="email"
      />
      <input
        type="text"
        placeholder="Enter Password"
        onChange={handleChange}
        name="password"
      />
      <input
        type="text"
        placeholder="Enter Full Name"
        onChange={handleChange}
        name="status"
      />
      <button className="formButton" onClick={handleBookSubmit}>
        Add
      </button>
    </div>
  );
};

export default Add;
