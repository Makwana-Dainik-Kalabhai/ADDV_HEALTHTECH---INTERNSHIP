import { PublicFooter } from "../components/common/PublicFooter";
import { PublicHeader } from "../components/common/PublicHeader";
import { Outlet } from "react-router-dom";

export const PublicLayout = () => {
    
    return (
        <>
            <PublicHeader />
            <Outlet />
            <PublicFooter />
        </>
    );
}