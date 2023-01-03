import axios from "axios";
import React from "react";
import { useState } from "react";
import { useLocation, useNavigate } from "react-router-dom";

const Update = () => {
  const [book, setBook] = useState({
    title: "",
    desc: "",
    price: "",
    cover: "",
  });

  const navigate = useNavigate();
  const location = useLocation();
  const bookId = location.pathname.split("/")[2];

  const handleBookSubmit = async (e) => {
    e.preventDefault();
    try {
      axios.put("http://localhost:8800/books3", book);
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
      <h1>Update Existing Book</h1>
      <input
        type="text"
        placeholder="title"
        onChange={handleChange}
        name="title"
      />
      <input
        type="text"
        placeholder="desc"
        onChange={handleChange}
        name="desc"
      />
      <input
        type="text"
        placeholder="price"
        onChange={handleChange}
        name="price"
      />
      <input
        type="text"
        placeholder="cover"
        onChange={handleChange}
        name="cover"
      />
      <button className="formButton" onClick={handleBookSubmit}>
        Update
      </button>
    </div>
  );
};

export default Update;
