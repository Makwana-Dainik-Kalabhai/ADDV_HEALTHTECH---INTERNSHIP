import { createBrowserRouter, RouterProvider } from "react-router-dom"
import { Home } from "../pages/public/Home";
import { PublicLayout } from "../layouts/PublicLayout";
import { Properties } from "../pages/public/Properties";
import { PropertyDetails } from "../pages/public/PropertyDetails";
import { AboutUs } from "../pages/public/AboutUs";
import { Contact } from "../pages/public/Contact";

export const PublicRoute = () => {
    let router = createBrowserRouter([{
        path: "/",
        element: <PublicLayout />,
        children: [
            {
                path: "/",
                element: <Home />
            },
            {
                path: "/properties",
                element: <Properties />
            },
            {
                path: "/properties/:id",
                element: <PropertyDetails />
            },
            {
                path: "/about-us",
                element: <AboutUs />
            },
            {
                path: "/contact",
                element: <Contact />
            }
        ]
    }]);

    return <RouterProvider router={router} />
}