import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";
import React, { useEffect, useState } from "react";

export default function Dashboard(props) {
    const [obats, setObats] = useState([]);

    useEffect(() => {
        fetchObats();
    }, []);

    const fetchObats = async () => {
        try {
            const response = await axios.get("/api/get-obat"); // Replace with your API endpoint
            setObats(response.data.obats);
        } catch (error) {
            console.error(error);
        }
    };

    return (
        <AuthenticatedLayout
            auth={props.auth}
            errors={props.errors}
            header={
                <h2 className="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    Dashboard | Data Obat
                </h2>
            }
        >
            <Head title="Dashboard" />

            <div className="flex justify-center p-5">
                <table className="min-w-full divide-y divide-gray-200 text-center">
                    <thead className="bg-gray-50">
                        <tr>
                            <th className="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nama Obat
                            </th>
                            <th className="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Jenis Obat
                            </th>
                            <th className="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Harga Satuan
                            </th>
                            <th className="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Stok
                            </th>
                            <th className="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Tanggal Kadaluarsa
                            </th>
                            {/* Add more table headers as needed */}
                        </tr>
                    </thead>
                    <tbody className="bg-white divide-y divide-gray-200">
                        {obats.map((obat) => (
                            <tr key={obat.id}>
                                <td className="px-6 py-4 whitespace-nowrap">
                                    {obat.nama_obat}
                                </td>
                                <td className="px-6 py-4 whitespace-nowrap">
                                    {obat.jenis_obat}
                                </td>
                                <td className="px-6 py-4 whitespace-nowrap">
                                    Rp. {obat.harga_satuan.toLocaleString()}
                                </td>
                                <td className="px-6 py-4 whitespace-nowrap">
                                    {obat.stok_obat}
                                </td>
                                <td className="px-6 py-4 whitespace-nowrap">
                                    {obat.tanggal_kadaluarsa}
                                </td>
                            </tr>
                        ))}
                    </tbody>
                </table>
            </div>
        </AuthenticatedLayout>
    );
}
