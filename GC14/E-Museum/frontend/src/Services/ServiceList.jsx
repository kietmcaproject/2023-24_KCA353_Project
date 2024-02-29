import React from "react"; 
import ServiceCard from "./ServiceCard";
import { Col } from "reactstrap";

import weatherImg from '../assets/images/weather.png'
import guideImg from '../assets/images/guide.png'
import customizationImg from '../assets/images/customization.png' 

const servicesData = [
{
    imgUrl: weatherImg,
    title: "Think of Museum",
    desc: "Just Think about the museum and tap 'E Museum' to see tghe magic. "
},

{
    imgUrl: guideImg,
    title: "Start Exploring",
    desc: "Explore the various museum around the world. "
},

{
    imgUrl: customizationImg,
    title: "Get Experience",
    desc: "Learn more about pricious and acceint things aroud the world."
},
];  

const ServiceList = () => {
    return (
        <>
            {servicesData.map((item, index) =>(
                <Col lg="3" key={index}> 
                <ServiceCard item={item} /> 
                </Col>
            ))}
        </>    
    ); 
};
     
export default ServiceList;