import React, { useState} from 'react';
import { LineChart, Line, XAxis, YAxis, CartesianGrid, Tooltip, Legend, ResponsiveContainer } from 'recharts';
import axios from 'axios';

const API_URL = "http://localhost/wordpress2/wp-json/mo/v1/jituu"

const Dashboard = () => {
    const [data, setData] = useState(null);

   // useEffect(() => {
        axios.get(API_URL)
            .then(Response => { setData(Response.data) })
            .catch(err => console.log(err));
   // }, []);

    if (!data) return <p>Loading...</p>;

    return (
        <div className='dashboard'>
            <div className="card">
                <h3>Analytics</h3>
                <ResponsiveContainer>
                    <LineChart data={data}>
                        <XAxis dataKey="post" />
                        <YAxis />
                        <Legend />
                        <Tooltip />
                        <CartesianGrid stroke="#eee" />
                        <Line type="monotone" dataKey="likes" stroke="#8884d8" />
                        <Line type="monotone" dataKey="dislikes" stroke="#82ca9d" />
                    </LineChart>
                </ResponsiveContainer>
            </div>
        </div>
    );
}


export default Dashboard;