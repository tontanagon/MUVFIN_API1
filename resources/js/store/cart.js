import { defineStore } from 'pinia'
import Swal from 'sweetalert2/dist/sweetalert2.js'
import 'sweetalert2/src/sweetalert2.scss'
export const useShoppingStore = defineStore('shopping', {
    state: () => {
        return {
            cartItems: [],
            order_history: [],
            total: []
        }
    },
    getters: {
        countCartItems() {
            return this.cartItems.length;
        },
        getCartItems() {
            return this.cartItems;
        }
    },
    actions: {
        addToCart(item, paramiter) {
            let index = this.cartItems.findIndex(product => product.id === item.id);
            console.log(paramiter)
            const erorr = () => {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'กรุณาเข้าสู่ระบบก่อนทำรายการ',
                    showConfirmButton: false,
                    timer: 1500
                })
            }
            const success = () => {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'เพิ่มหนังลงตะกร้าเรียบร้อยเเล้ว',
                    showConfirmButton: false,
                    timer: 1500
                })
            }
            if (paramiter) {
                if (index !== -1) {
                    this.cartItems[index].quantity += 1;
                    success()
                } else {
                    item.quantity = 1;
                    this.cartItems.push(item);
                    success()
                }
            } else {
                erorr()
            }
        },
        incrementQ(item) {
            let index = this.cartItems.findIndex(product => product.id === item.id);
            if (index !== -1) {
                this.cartItems[index].quantity += 1;
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'เพิ่มจำนวนหนังเรียบร้อย',
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        },
        decrementQ(item) {
            let index = this.cartItems.findIndex(product => product.id === item.id);
            if (index !== -1) {
                this.cartItems[index].quantity -= 1;
                if (this.cartItems[index].quantity === 0) {
                    this.cartItems = this.cartItems.filter(product => product.id !== item.id);
                }
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'ลดจำนวนหนังเรียบร้อย',
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        },
        removeFromCart(item) {
            this.cartItems = this.cartItems.filter(product => product.id !== item.id);
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'ลบหนังออกจากตะกร้าเรียบร้อย',
                showConfirmButton: false,
                timer: 1500
            });
        },
        addTohistory(item, totalnodis, dis, totaldis) {
            const i = [totalnodis, dis, totaldis];
            if (totalnodis > 0) {
                this.order_history.push(item);
                const checkedItems = this.cartItems.filter(product => product.checked);
                if (checkedItems.length > 0) {
                    this.cartItems = this.cartItems.filter(product => !product.checked);
                    this.total.push(i);
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'ทำรายการเสร็จสิ้น',
                        showConfirmButton: false,
                        timer: 1500
                    });
                } else {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'กรุณาเลือกสินค้าที่ต้องการชำระเงิน',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            } else {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'กรุณาเพิ่มรายการ',
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        },
    },
})
