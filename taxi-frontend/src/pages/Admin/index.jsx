import React, { useEffect, useState } from "react";
import "./index.css";
import Header from "../../components/ui/header";
import Button from "../../components/ui/button";

const mockdata = [
  {
    user_id: 1,
    driver_id: 2,
    driver_name: "Khaled",
    passenger_name: "George",
    cost: 25.21,
    date: "15/05/2002",
  },
  {
    user_id: 4,
    driver_id: 31,
    driver_name: "Bo ALI ",
    passenger_name: "Alice",
    cost: 8,
    date: "28/05/2002",
  },
];

const Admin = () => {
  const [isElectronApp, setIsElectronApp] = useState(true);

  useEffect(() => {
    const isElectron = navigator.userAgent.toLowerCase().indexOf(' electron/') > -1 ;


    if (!isElectron) {
      setIsElectronApp(false);
    }
  }, []);

  if (!isElectronApp) {
    // Render an alternative component or show a message for non-Electron environments
    return (
      <>
        <Header />
        <main>
          <p>You are not allowed - this component can only be used in Electron.</p>
        </main>
      </>
    );
  }

  return (
    <>
      <Header />
      <main>
        <table>
          <thead>
            <tr>
              <th>User ID</th>
              <th>Driver ID</th>
              <th>Driver Name</th>
              <th>Passenger Name</th>
              <th>Cost</th>
              <th>Date</th>
            </tr>
          </thead>
          <tbody>
            {mockdata.map((ride, index) => (
              <tr key={index}>
                <td>{ride.user_id}</td>
                <td>{ride.driver_id}</td>
                <td>{ride.driver_name}</td>
                <td>{ride.passenger_name}</td>
                <td>{ride.cost}</td>
                <td>{ride.date}</td>
              </tr>
            ))}
          </tbody>
        </table>
      </main>
    </>
  );
};

export default Admin;
