import React from "react";
import { useEffect } from "react";
import { useState } from "react";
import axios from "axios";
import { Link } from "react-router-dom";
import Header from "../Header";

const Patients = () => {
  const [patients, setUsers] = useState([]);
  const [ippatients, setIpUsers] = useState([]);

  useEffect(() => {
    const fetchAllUsers = async () => {
      try {
        const res = await axios.get("http://localhost:8800/ippatients");
        console.log(res);
        setIpUsers(res.data);
      } catch (error) {
        console.log("Error->" + error);
      }
    };
    fetchAllUsers();
  }, []);

  useEffect(() => {
    const fetchAllUsers = async () => {
      try {
        const res = await axios.get("http://localhost:8800/oppatients");
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
      await axios.delete(`http://localhost:8800/patients${userkId}`);
      window.location.reload();
    } catch (error) {
      console.log(error);
    }
  };

  return (
<div>
   <Header/>
   <div className="content-wrapper">
      <section className="content">
         <div className="card card-primary card-outline card-outline-tabs">
            <div className="card-header p-0 border-bottom-0">
               <ul className="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
               <li class="nav-item">
<a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">OP Patient</a>
</li>
<li class="nav-item">
<a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">IP Patient</a>
</li>
                  <div className="col-sm-5">
                     <center>
                        <div className="nav-link">User List</div>
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
						  <div className="tab-content" id="custom-tabs-four-tabContent">
                             <div className="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
							  <div className="card-body">
                                <table id="example2" className="table table-bordered table-hover">
                                 <thead>
                                    <tr>
                                    <th>PatientId</th>
                                    <th>Title</th>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>Age</th>
                                    <th>Relation</th>
                                    <th>RoomNo</th>
                                    <th>Village</th>
                                    <th>Token#</th>
                                    <th>Fees</th>
                                    <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 {!patients.length
                                  ? <tr>No data found.</tr>
                                  : patients.map((user) => (
                                    <tr key={user.id}>
                                       <td>{user.id}</td>
                                       <td>{user.disease_name}</td>
                                       <td>{user.full_name}</td>
                                       <td>{user.gender}</td>
                                       <td>{user.age}</td>
                                       <td>{user.relation_name}</td>
                                       <td>{user.district_name}</td>
                                       <td>{user.village_name}</td>
                                       <td>HC{user.id}</td>
                                       <td>{user.fees}</td>
                                       <td>
                                          <button className="update">
                                             <Link to={`/update${user.id}`}>
                                             Update</Link>
                                          </button>
                                       </td>
                                       <td> 
                                          <button className="delete" onClick={() => handleDelete(user.id)}>Delete</button>
                                       </td>
                                    </tr>
                                    ))}
                                 </tbody>
                              </table>
                              </div>
                              </div>
						      <div className="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
							  <div className="card-body">
                                 <table id="example2" className="table table-bordered table-hover">
                                 <thead>
                                    <tr>
                                    <th>PatientId</th>
                                    <th>Title</th>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>Age</th>
                                    <th>Relation</th>
                                    <th>RoomNo</th>
                                    <th>Village</th>
                                    <th>Token#</th>
                                    <th>Fees</th>
                                    <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 {!ippatients.length
                                  ? <tr>No data found.</tr>
                                  : ippatients.map((user) => (
                                    <tr key={user.id}>
                                      <td>{user.id}</td>
                                       <td>{user.disease_name}</td>
                                       <td>{user.full_name}</td>
                                       <td>{user.gender}</td>
                                       <td>{user.age}</td>
                                       <td>{user.relation_name}</td>
                                       <td>{user.district_name}</td>
                                       <td>{user.village_name}</td>
                                       <td>HC{user.id}</td>
                                       <td>{user.fees}</td>
                                       <td>
                                          <button className="update">
                                             <Link to={`/update${user.id}`}>
                                             Update</Link>
                                          </button>
                                       </td>
                                       <td> 
                                          <button className="delete" onClick={() => handleDelete(user.id)}>Delete</button>
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
export default Patients;


