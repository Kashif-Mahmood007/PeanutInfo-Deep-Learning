

import matplotlib.pyplot as plt

# Data
metrics = ['Accuracy', 'Precision', 'Recall', 'F1 Score']
values = [98.26, 98.32, 98.26, 98.29]

# Plotting the line chart
plt.figure(figsize=(10, 6))
plt.plot(metrics, values, marker='o', linestyle='-', color='green', linewidth=2, markersize=9)

# Title and labels
plt.title('Performance Metrics, ConvNeXt-Tiny', fontsize=18, color = "#0b3d2c", fontweight='bold')
plt.xlabel('Metrics', fontsize=14, color = "#0b3d2c", fontweight='bold')
plt.ylabel('Percentage (%)', fontsize=14, color = "#0b3d2c", fontweight='bold')
plt.xticks(fontsize=12, color = "#0b3d2c", fontweight='bold')
plt.yticks(fontsize=12, color = "#0b3d2c", fontweight='bold')  

# Annotating the points
for i, value in enumerate(values):
    plt.text(metrics[i], value + 0.01, f'{value}%', ha='center', fontsize=12)

# Grid and layout
plt.grid(True)
plt.tight_layout()
plt.show()


