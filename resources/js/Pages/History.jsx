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
import axios from 'axios';

import Layout from '../Layouts';

  export default function History({ id }) {
    const [history, setHistory] = useState([]);
    const [cultivation, setCultivation] = useState({});
    const [total, setTotal] = useState(0);
    const [currentPage, setCurrentPage] = useState(1);

    useEffect(() => {
        (async ()=>{
            const { data: { history: h, total: totalResults, ...rest} } = await axios.get(`/api/cultivations/${id}?page=${currentPage}`)
            setCultivation(rest);
            setHistory(h);
            setTotatl(totalResults);
        })()
    },[id, currentPage]);
    const Header = () => (
        <>
            <span className='font-bold'> Histórico - {cultivation.name}</span>
            &nbsp;&nbsp;
            <Badge type="success">{new Date(cultivation.updated_at).toLocaleString()}</Badge>
        </>
    );
    return (
        <>
            <Head title='Cultivation'/>
            <Layout header={<Header/>}>
                <TableContainer>
                    <Table>
                        <TableHeader>
                        <TableRow>
                            <TableCell>Unidade</TableCell>
                            <TableCell>Preço</TableCell>
                            <TableCell>Data</TableCell>
                        </TableRow>
                        </TableHeader>
                        <TableBody>
                            {
                                history.map(({id, state, price, date}) => {
                                    return (
                                        <TableRow key={id}>
                                            <TableCell  className="font-bold">{state}</TableCell>
                                            <TableCell className="font-bold">
                                                {price}
                                            </TableCell>
                                            <TableCell>
                                                <Badge type="success">{new Date(date).toLocaleString()}</Badge>
                                            </TableCell>
                                        </TableRow>
                                    )
                                })
                            }
                        </TableBody>
                    </Table>
                    <TableFooter>
                        <Pagination totalResults={total} resultsPerPage="10" onChange={(page) => setCurrentPage(page)} label="Table navigation" />
                    </TableFooter>
                </TableContainer>
            </Layout>
        </>
    );
  }