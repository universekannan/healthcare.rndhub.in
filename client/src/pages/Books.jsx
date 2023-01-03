import React from "react";
import { useEffect } from "react";
import { useState } from "react";
import axios from "axios";
import { Link } from "react-router-dom";

const Books = () => {
  const [books, setBooks] = useState([]);

  useEffect(() => {
    const fetchAllBooks = async () => {
      try {
        const res = await axios.get("http://localhost:8800/books");
        console.log(res);
        setBooks(res.data);
      } catch (error) {
        console.log("Error->" + error);
      }
    };
    fetchAllBooks();
  }, []);

  const handleDelete = async (bookId) => {
    console.log("handleDelete");
    try {
      await axios.delete(`http://localhost:8800/books${bookId}`);
      window.location.reload();
    } catch (error) {
      console.log(error);
    }
  };

  return (
    <div>
	
      <h3>Users List</h3>
<table>
  <tr>
    <th>ID</th>
    <th>Full Name</th>
    <th>Email</th>
    <th>Password</th>
    <th>Status</th>
    <th>Update</th>
    <th>Delete</th>
  </tr>
  {books.map((book) => (
 <tr key={book.id}>
    <td>{book.id}</td>
    <td>{book.full_name}</td>
    <td>{book.email}</td>
    <td>{book.password}</td>
    <td>{book.status}</td>
    <td>
        <button className="update"><Link to={`/update${book.id}`}>Update</Link></button>
	</td>
    <td> 
	     <button className="delete" onClick={() => handleDelete(book.id)}>Delete</button>
	</td>
  </tr>
    ))}
</table>
    </div>
  );
};
export default Books;