import React, { Component } from 'react'

export default class Headers extends Component {
  render() {
    return (
      <div><center>
      <nav className="main-header navbar navbar-expand-md navbar-light navbar-white">
        {/* Left navbar links */}
        <legend className="scheduler-border">
          <ul className="navbar-nav">
            <div>  <div className="row">
                <a href="#" className="navbar-toggler order-1">
                  <img alt="Logo" />
                </a>
                <li className="navbar-toggler order-1">
                  <a className="nav-link" data-widget="pushmenu" href="#" role="button"><i className="fas fa-bars" /></a>
                </li>
              </div>
            </div>
            <li className="nav-item d-none d-sm-inline-block col-md-1">
              <a href="./dashboard">
                <img src="http://healthcare.rndhub.in/dist/img/icon/opd.png" style={{width: 50}} /><br />
                <label>Dashboard</label>
              </a>
            </li>
            <li className="nav-item d-none d-sm-inline-block col-md-1">
              <img style={{width: 50}} /><br />
              <div className="dropdown">
                <a className="dropbtn"><label>Users</label></a>
                <div className="dropdown-content">
                  <a href="../Users">Users</a>
                  <a href="./patients">Patients</a>
                  <a href="./users/userstype">User Type</a>
                  <a href="./users/setting">Setting</a>
                  <a href="../Users/Permission">Permissions</a>
                </div>
              </div>
            </li>
            <li className="nav-item d-none d-sm-inline-block col-md-1">
              <a href>
                <img src="http://healthcare.rndhub.in/dist/img/icon/admission.png" style={{width: 50}} /><br />
                <label>Admission</label>
              </a>
            </li>
            <li className="nav-item d-none d-sm-inline-block col-md-1">
              <a href>
                <img src="http://healthcare.rndhub.in/dist/img/icon/billing.png" style={{width: 50}} /><br />
                <label>Billing</label>
              </a>
            </li>
            <li className="nav-item d-none d-sm-inline-block col-md-1">
              <a href>
                <img src="http://healthcare.rndhub.in/dist/img/icon/pharmacy.png" style={{width: 50}} /><br />
              </a><div className="dropdown"><a href>
                </a><a className="dropbtn">
                  <label>Pharmacy</label></a>
                <div className="dropdown-content">
                  <a href>Sales</a>
                  <a onclick="window.open('./pharmacy/newsales','MY Window','height=700,width=1350,top=100,centeralign=200,right=300')" type="button">New Bill</a>      </div>
              </div>
            </li>
            <li className="nav-item d-none d-sm-inline-block col-md-1">
              <a href>
                <img src="http://healthcare.rndhub.in/dist/img/icon/setting.png" style={{width: 50}} /><br />
              </a><div className="dropdown"><a href>
                </a><a className="dropbtn">
                  <label>Setting</label></a>
                <div className="dropdown-content">
                  <a href="./blocks">Blocks</a>
                  <a href>Change </a>
                  <a href>Change </a>
                  <a href>Change </a>
                  <a href>Change </a>
                </div>
              </div>
            </li>
            <li className="nav-item d-none d-sm-inline-block col-md-1">
              <img src="http://healthcare.rndhub.in/dist/img/icon/logout.png" style={{width: 50}} /><br />
              <div className="dropdown">
                <a className="dropbtn"><label>Log Out</label></a>
                <div className="dropdown-content">
                  <a href> User Details</a>
                  <a href>Backup</a>
                  <a href>Change Password</a>
                  <a href="./">Log Out</a>
                </div>
              </div>
            </li>  
          </ul>
        </legend>
        </nav>
        </center>
      </div>
    )
  }
}
