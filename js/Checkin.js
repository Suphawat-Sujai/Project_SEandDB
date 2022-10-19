if($('#submit-checkin').length){
    $('#submit-checkin').on('click', () => {
        checkin.insertCustomer();
    })
}

if($('#search_room').length){
    $('#search_room').on('click', () => {
        checkin.searchroom();
    })
}

const checkin ={
    searchroom: async () => {
        let room_no = document.getElementById('room_no').value;
        const res = await axios.post("http://localhost:8000/check-room", {
            room_no: room_no
        });
        console.log(res);
        let result = res.data.result[0];
        let data =``;
        if(result.length != 0){
            data = `
            <div>
                <p>ห้อง ${result.Room_no} ${result.Avaliable_state == "Y" ? "ว่าง" : "ไม่ว่าง"}</p>
            </div>
            `;
        }else{
            data = `
            <div>
                <p>ไม่พบข้อมูล</p>
            </div>
            `;
        }

        $('#modal-body').html(data);
    },

    insertCustomer: async () => {
        let room_no = document.getElementById('room_no').value;
        let name = document.getElementById('name').value;
        let passport = document.getElementById('passport').value;
        let email = document.getElementById('email').value;
        let phone = document.getElementById('phone_number').value;
        const res = await axios.post("http://localhost:8000/check-in", {
            room_no: room_no,
            name: name,
            passport: passport,
            email: email,
            phone: phone,
        });
        console.log(res);
        let result = res.data;
        let data =``;
        if(result.code == 0){
            data = `
            <div>
                <p>บันทึกข้อมูลสำเร็จ</p>
            </div>
            `;
        }else{
            data = `
            <div>
                <p>บันทึกข้อมูลไม่สำเร็จ</p>
            </div>
            `;
        }

        $('#modal-success').html(data);
    }
    
}