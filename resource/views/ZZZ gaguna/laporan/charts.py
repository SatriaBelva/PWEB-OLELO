import matplotlib.pyplot as plt
import numpy as np

# Omset Penjualan OLELO 2024
months = ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC']
omset = [150000, 200000, 180000, 220000, 300000, 250000, 270000, 290000, 320000, 310000, 350000, 400000]

plt.figure(figsize=(10, 5))
plt.bar(months, omset, color='blue', alpha=0.7)
plt.xlabel('Bulan')
plt.ylabel('Omset (IDR)')
plt.title('Omset Penjualan OLELO 2024')
plt.savefig('omset_penjualan.png')

# Grafik Penjualan OLELO 2024
grafik_penjualan = np.cumsum(omset)

plt.figure(figsize=(10, 5))
plt.plot(months, grafik_penjualan, marker='o', linestyle='-', color='blue', alpha=0.7)
plt.xlabel('Bulan')
plt.ylabel('Grafik Penjualan (IDR)')
plt.title('Grafik Penjualan OLELO 2024')
plt.savefig('grafik_penjualan.png')
