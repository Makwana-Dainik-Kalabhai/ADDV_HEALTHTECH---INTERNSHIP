import "../../assets/styles/public-home.css";
import { Hero } from "./components/home/Hero";
import { Amenities } from "./components/home/Amenities";
import { Properties } from "./components/home/properties/Properties";
import { useEffect } from "react";

export const Home = () => {
    useEffect(() => {
        window.scrollTo({ top: 0, behavior: "smooth" });
    }, []);

    return (
        <>
            <Hero />
            <Amenities/>
            <Properties />
        </>
    );
}