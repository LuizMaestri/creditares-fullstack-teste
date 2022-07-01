import React from 'react';
import ApplicationLogo from '@/Components/ApplicationLogo';
import { Link } from '@inertiajs/inertia-react';

export default function Layout({ header, children }) {

    return (
        <div className="min-h-full bg-gray-100">
            <nav className="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded dark:bg-gray-800">
                <div className="container flex flex-wrap justify-between items-center mx-auto">
                    <Link href="/" className="flex items-center">
                        <ApplicationLogo className="mr-3 h-8 sm:h-9" />
                    </Link>
                </div>
            </nav>

            {header && (
                <header className="bg-white shadow">
                    <div className="container flex flex-wrap justify-between items-center mx-auto">
                        <div className="border-gray-200 h-8 font-extrabold">{header}</div>
                    </div>
                </header>
            )}
            <br />
            <main>{children}</main>
        </div>
    );
}
