# Implementasi AES-128 dengan kunci MD-5 pada FILE
Aplikasi ANALISA PERFORMA KRIPTOGRAFI UNTUK PENGAMANAN DOKUMEN MENGGUNAKAN ALGORITMA AES – 128 DENGAN KUNCI YANG DI ENKRIPSI MENGGUNAKAN MD – 5 

Tujuan pembuatan aplikasi ini untuk menganalisis performa algoritma AES-128 bit dengan kunci yang dienkripsi menggunakan MD-5 dengan parameter waktu eksekusi berdasarkan jenis file ataupun ukuran file dan nilai avalanche effect yang diperoleh dari perubahan key yang digunakan serta menguji nilai entropy hasil dari enkripsi.

Pada penelitian ini penulis menggunakan kombinasi algoritma MD-5 dalam penyandian kunci AES-128 bit sebelum melakukan enkripsi ataupun  dekripsi dengan kunci yang sebelumnya di enkripsi menggunakan MD-5 dan dipotong 16 karakter, karena pada algoritma AES-128 bit yang termasuk algoritma simetri dengan kunci privat yang sama yang artinya jika kunci sudah ditemukan maka enkripsi mudah untuk diserang. Algoritma MD-5 atau Message-Digest algortihm 5 merupakan fungsi hash satu arah dengan metode mengubah suatu data dengan ukuran panjang tertentu dengan adanya proses menyisipkan data didalamnya sehingga susah untuk dipulihkan kembali walaupun melihat bentuk dari hash tersebut.
Dalam hal ini digunakan beberapa parameter yang digunakan untuk menentukan bahwa algoritma yang digunakan kuat dan efesien yaitu dengan menentukan beberapa jenis file berbagai ukuran, waktu eksekusi enkripsi maupun dekripsi serta nilai avalanche effect dan nilai entropy. Avalanche effect adalah persentase nilai yang menunjukkan perubahan plaintext ataupun key yang menyebabkan chipertext yang dihasilkan, jika nilai menunjukkan setengahnya jumlah bit chipertext (50%) maka enkripsi sukar untuk dipecahkan (Aminudin et al. 2018), sedangkan untuk entropy merupakan informasi kandungan rata-rata karakter di dalam codeword (Mayasari dan Irawan 2021). Menurut (Aminudin et al. 2018) pemilihan pengujian waktu proses digunakan untuk menilai seberapa efisiensi waktu enkripsi dan dekripsi dari algoritma yang dikombinasikan. Pengujian avalanche effect dan entropy sangat cocok dalam pengujian dokumen file dokumen karena melihat keacakan dan ketidakpastian dari hasil file dokumen yang dienkripsi (Mayasari dan Irawan 2021).


nama database : kriptografi

# Cara Penggunaan
Untuk menggunakan Aplikasi ini buatlah 3 folder di dalam folder dashboard yakni
1. folder dengan nama "file_encrypt"
2. folder dengan nama "file_decrypt"
3. folder dengan nama "terupload"


