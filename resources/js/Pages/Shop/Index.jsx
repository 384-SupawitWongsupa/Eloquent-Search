import React, { useState } from "react";
import { Card, Typography } from "@material-tailwind/react";
import ApplicationLogo from "@/Components/ApplicationLogo";

export default function Index({ orders }) {
  // สร้าง state สำหรับจัดเก็บการจัดเรียง
  const [sortedOrders, setSortedOrders] = useState(orders);

  // ฟังก์ชันจัดเรียงตามประเภท (ราคา หรือ วันที่)
  const sortOrders = (criteria) => {
    const sorted = [...sortedOrders].sort((a, b) => {
      if (criteria === "price") {
        return a.total_amount - b.total_amount;
      } else if (criteria === "date") {
        return new Date(a.order_date) - new Date(b.order_date);
      }
      return 0;
    });
    setSortedOrders(sorted);
  };

  // ฟังก์ชันที่ใช้สำหรับจัดการการเลือกใน dropdown
  const handleSortChange = (e) => {
    const value = e.target.value;
    sortOrders(value);
  };

  return (
    <div className="p-10 bg-gray-100 min-h-screen">
      <div className="flex justify-center items-center">
        <ApplicationLogo className="w-20 h-20 text-green-600" />
      </div>
      <h3 className="text-3xl font-bold text-center mt-8 mb-10 text-gray-900">Shop</h3>

      {/* Dropdown สำหรับจัดเรียง */}
      <Card className="h-full w-full overflow-auto border-gray-300 px-6 py-6 mb-6 bg-white shadow-lg">
        <div className="flex justify-end mb-4">
          <select
            onChange={handleSortChange}
            className="px-4 py-2 text-gray-900 bg-blue-500 border-none appearance-none rounded-lg hover:bg-blue-600 focus:outline-none"
          >
            <option value="">Sort Orders By</option>
            <option value="price">Price</option>
            <option value="date">Date</option>
          </select>
        </div>

        <Typography variant="lead" color="blue-gray" className="font-bold mb-4">
          Order Details
        </Typography>
        <Typography className="mb-6 text-gray-600">
          Overview of all customer orders and their statuses.
        </Typography>

        <table className="w-full min-w-max table-auto text-left rounded-lg overflow-hidden text-sm">
          <thead>
            <tr className="bg-gradient-to-r from-green-400 via-blue-500 to-purple-600 text-white">
              <th className="p-4">Order #</th>
              <th className="p-4">Date</th>
              <th className="p-4">Status</th>
              <th className="p-4">Customer</th>
              <th className="p-4">Email</th>
              <th className="p-4">Address</th>
              <th className="p-4">Total Amount</th>
              <th className="p-4">Details</th>
            </tr>
          </thead>
          <tbody>
            {sortedOrders.map((order) => {
              const orderProductQuantities = {};

              order.order_details.forEach((detail) => {
                if (orderProductQuantities[detail.product.name]) {
                  orderProductQuantities[detail.product.name] += detail.quantity;
                } else {
                  orderProductQuantities[detail.product.name] = detail.quantity;
                }
              });

              return (
                <tr key={order.id} className="border-b-2 border-gray-200 hover:bg-gray-50">
                  <td className="p-4">{order.id}</td>
                  <td className="p-4">{new Date(order.order_date).toLocaleString()}</td>
                  <td className="p-4">
                    <span className={`text-${order.status === 'pending' ? 'yellow' : order.status === 'completed' ? 'green' : 'red'}-600`}>
                      {order.status}
                    </span>
                  </td>
                  <td className="p-4">{order.customer.name}</td>
                  <td className="p-4">{order.customer.email}</td>
                  <td className="p-4">{order.customer.address}</td>
                  <td className="p-4 font-semibold text-gray-800">${order.total_amount}</td>
                  <td className="p-4">
                    <ul className="list-disc ml-6 space-y-1 text-gray-700">
                      {Object.entries(orderProductQuantities).map(([productName, quantity]) => (
                        <li key={productName}>
                          <span className="font-semibold">{productName}</span> {quantity} pcs
                        </li>
                      ))}
                    </ul>
                  </td>
                </tr>
              );
            })}
          </tbody>
        </table>
      </Card>
    </div>
  );
}
