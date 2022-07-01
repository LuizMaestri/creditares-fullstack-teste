import React, { useState, useEffect } from 'react';
import { Link, Head } from '@inertiajs/inertia-react';
import {
    TableContainer,
    Table,
    TableHeader,
    TableBody,
    TableRow,
    TableCell,
    Pagination,
    Badge,
    TableFooter
  } from 'windmill-react-ui-kit';
import Layout from '../Layouts';

const EyeIcon = () => (
    <svg xmlns="http://www.w3.org/2000/svg" className="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
        <path fillRule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clipRule="evenodd" />
    </svg>
);

export default function Cultivation() {
    const [cultivations, setCultivations] = useState([]);
    useEffect(() => {
        (async () => {
            const { data } = await axios.get('/api/cultivations');
            setCultivations(data);
        })()
    }, []);
    return (
        <>
            <Head title='Cultivation'/>
            <Layout header="Cultivos">
                <TableContainer>
                    <Table>
                        <TableHeader>
                        <TableRow>
                            <TableCell>Cultivo</TableCell>
                            <TableCell>Atualização</TableCell>
                            <TableCell>Histórico</TableCell>
                        </TableRow>
                        </TableHeader>
                        <TableBody>
                            {
                                cultivations.map(({id, name, updated_at}) => {
                                    return (
                                        <TableRow key={id}>
                                            <TableCell className="font-bold">
                                                {name}
                                            </TableCell>
                                            <TableCell>
                                                <Badge type="success">{new Date(updated_at).toLocaleString()}</Badge>
                                            </TableCell>
                                            <TableCell>
                                                <Link href={`/${id}/history`} className="flex items-center">
                                                    <EyeIcon/>
                                                </Link>
                                            </TableCell>
                                        </TableRow>
                                    )
                                })
                            }
                        </TableBody>
                    </Table>
                    <TableFooter/>
                </TableContainer>
            </Layout>
        </>
    )
}