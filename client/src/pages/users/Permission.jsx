import React from "react";
import { useEffect } from "react";
import { useState } from "react";
import { usertypeState } from "react";
import axios from "axios";
import { Link } from "react-router-dom";
import Headers from "../Headers";

const Users = () => {
  const [users, setUsers] = useState([]);
  useEffect(() => {
    const fetchAllUsers = async () => {
      try {
        const res = await axios.get("http://localhost:8800/users");
        console.log(res);
        setUsers(res.data);
      } catch (error) {
        console.log("Error->" + error);
      }
    };
    fetchAllUsers();
  }, []);


  const handleDelete = async (userkId) => {
    console.log("handleDelete");
    try {
      await axios.delete(`http://localhost:8800/users${userkId}`);
      window.location.reload();
    } catch (error) {
      console.log(error);
    }
  };

  return (
<div>
   <Headers/>
   <div className="content-wrapper">
      <section className="content">
         <div className="card card-primary card-outline card-outline-tabs">
            <div className="card-header p-0 border-bottom-0">
               <ul className="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                  <li className="nav-item">
                     <a className="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">All Users</a>
                  </li>
                  <div className="col-sm-6">
                     <center>
                        <div className="nav-link">User Permission</div>
                     </center>
                  </div>
                  <div className="col-sm-4 myinput">
                     <input type="text" className="form-control mb-3" name="first_name" id="myInput" onkeyup="myFunction()"  placeholder="Enter First Name"/>
                     </div>
                  <div className="col-sm-1">
                     <td>
                        <button type="button" className="btn btn-block btn-outline-danger btn-xs" data-toggle="modal" data-target="#adduser"><i className="fa fa-plus"> </i> Add</button>
                     </td>
                  </div>
               </ul>
            </div>
            <section className="content">
               <div className="container-fluid">
                  <div className="row">
                     <div className="col-12">
                        <div className="card">
                           <div className="card-body">
                              <table id="example2" className="table table-bordered table-hover">
                                 <thead>
                                    <tr>
                                       <th>ID</th>
                                       <th>Full Name</th>
                                       <th>User Types</th>
                                       <th>Email</th>
                                       <th>Status</th>
                                       <th>Update</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 {!users.length
                                  ? <tr>No data found.</tr>
                                  : users.map((user) => (
                                    <tr key={user.id}>
                                       <td>{user.id}</td>
                                       <td>{user.full_name}</td>
                                       <td>{user.user_types_name}</td>
                                       <td>{user.email}</td>
                                       <td>{user.status}</td>
                                       <td>
                                       <button className="btn btn-default btn-outline-danger btn-xs fa fa-eye" data-toggle="modal" data-target="#permissions"> Permission</button>
                                      
                                       <div className="modal fade" id="permissions" tabIndex={-1} role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                       <form action method="post">	  
                                          <div className="modal-dialog modal-dialog-scrollable" role="document">
                                             <div className="modal-content">
                                             <div className="modal-header">
                                                <h5 className="modal-title" id="exampleModalScrollableTitle">Add Permission</h5>
                                                <button type="button" className="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                             </div>
                                             <div className="modal-body">
                                                <input type="hidden" className="form-control" name="user_id" defaultValue="{{ $manageuserslist->user_id }}" />
                                                <div className="card card-success ">
                                                   <div className="card-body ">
                                                   <div className="row row-color">
                                                      <label className="col-sm-4">Dashboard</label>
                                                   </div>
                                                   <div className="row row-padded">
                                                      <label htmlFor="dashboard" className="col-sm-2">1</label>
                                                      <label htmlFor="dashboard" className="col-sm-8">Dashboard
                                                         <label className="col-sm-1"><input defaultValue={1} type="checkbox" name="dashboard" id="dashboard" defaultChecked /></label>
                                                         <label className="col-sm-1"><input defaultValue={1} type="checkbox" name="dashboard" id="dashboard" /></label>
                                                      </label>
                                                    </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div className="modal-footer justify-content-between">
                                                <button type="button" className="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="submit" className="btn btn-primary">Submit</button>
                                             </div>
                                             </div>
                                          </div>
                                       </form>
                                       </div>

                                       </td>
                                    </tr>
                                    ))}
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
         </div>
      </section>
   </div>
   <div className="modal fade" id="adduser">
   <form action="" method="post">
      <div className="modal-dialog">
         <div className="modal-content">
            <div className="modal-header">
               <h4 className="modal-title">Add User</h4>
               <button type="button" className="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div className="modal-body">
               <div className="row">
                  <div className="col-md-6">
                     <input type="text" className="form-control mb-3" name="first_name" placeholder="Enter First Name"/>
                     <input type="email" className="form-control mb-3" name="email" placeholder="Enter Email"/>
                     <input type="password" className="form-control mb-3" name="password" placeholder="Enter Password"/>
                     <select  className="form-control mb-3" name="user_types_id">
                        <option value="">Select User Type</option>
                        <option value="a">aaaa</option>
                     </select>
                     <select className="form-control mb-3" name="gender">
                        <option>Select Gender</option>
                        <option value="Mail">Mail</option>
                        <option value="Fmail">Femail</option>
                     </select>
                  </div>
                  <div className="col-md-6">   
                     <input type="text" className="form-control mb-3" name="last_name" placeholder="Enter Last Name"/>
                     <input type="text" className="form-control mb-3" name="mobile_number" placeholder="Enter Mobile Number"/>
                     <input type="text" className="form-control mb-3" name="check_password" placeholder="Enter Conform Password"/>
                     <textarea name='address' className="form-control" rows="3" placeholder="Enter Address..." ></textarea>
                  </div>
               </div>
            </div>
            <div className="modal-footer justify-content-between">
               <button type="button" className="btn btn-default" data-dismiss="modal">Close</button>
               <button type="submit" className="btn btn-primary">Submit</button>
            </div>
         </div>
      </div>
   </form>
</div>
</div>
  );
};
export default Users;


