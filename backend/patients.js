import express from "express";
import mysql from "mysql";
import cors from "cors";

const app = express();

const db = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "",
  database: "react_healthcare",
});

app.use(express.json());
app.use(cors());

app.get("/", (req, res) => {
  res.json("hello world");
});

app.get("/users", (req, res) => {
  const q = "select a.*,b.user_types_name from users a,user_types b where a.user_types_id=b.user_types_id";
  db.query(q, (err, data) => {
    if (err) {
      return res.json(err);
    }
    return res.json(data);
  });
});

app.get("/Usertype", (req, res) => {
  const q = "select * from user_types";
  db.query(q, (err, data) => {
    if (err) {
      return res.json(err);
    }
    return res.json(data);
  });
});

app.post("/users", (req, res) => {
  const q = "INSERT INTO r_kannan.users (title, `desc`, price, cover) VALUES(?);";

  const values = [
    req.body.title,
    req.body.desc,
    req.body.price,
    req.body.cover,
  ];

  db.query(q, [values], (err, data) => {
    if (err) {
      return res.json(err);
    }
    return res.json("Book created successfully");
  });
});

app.delete("/users:id", (req, res) => {
  const bookId = req.params.id;
  const q = "DELETE FROM users WHERE id=?";
  db.query(q, [bookId], (err, data) => {
    if (err) {
      return res.json(err);
    }
    return res.json("Book deleted successfully");
  });
});

app.put("/users:id", (req, res) => {
  const bookId = req.params.id;
  const q = "UPDATE users SET title=?, `desc`=?, price=?, cover=? WHERE id=?";

  const values = [
    req.body.title,
    req.body.desc,
    req.body.price,
    req.body.cover,
    bookId,
  ];
  db.query(q, [...values, bookId], (err, data) => {
    if (err) {
      return res.json(err);
    }
    return res.json("Book updated successfully");
  });
});

app.listen(8800, () => {
  console.log("Local host started!!");
});
