import tkinter as tk

class Account:
    def __init__(self, principal, rate, time):
        self.principal = principal
        self.rate = rate
        self.time = time

    def compound_interest(self):
        return self.principal * (1 + self.rate/100)**self.time

class CompoundInterestCalculator(Account):
    def __init__(self, principal, rate, time):
        super().__init__(principal, rate, time)

    def calculate(self):
        return self.compound_interest()

def calculate_interest():
    principal = float(principal_entry.get())
    rate = float(rate_entry.get())
    time = int(time_entry.get())
    
    calculator = CompoundInterestCalculator(principal, rate, time)
    result = calculator.calculate()
    
    result_label.config(text=f"Compound interest after {time} years: ${result:.2f}")

# GUI Setup
root = tk.Tk()
root.title("Compound Interest Calculator")

principal_label = tk.Label(root, text="Enter Principal Amount:")
principal_label.grid(row=0, column=0)

principal_entry = tk.Entry(root)
principal_entry.grid(row=0, column=1)

rate_label = tk.Label(root, text="Enter Annual Interest Rate (%):")
rate_label.grid(row=1, column=0)

rate_entry = tk.Entry(root)
rate_entry.grid(row=1, column=1)

time_label = tk.Label(root, text="Enter Time Period (in years):")
time_label.grid(row=2, column=0)

time_entry = tk.Entry(root)
time_entry.grid(row=2, column=1)

calculate_button = tk.Button(root, text="Calculate", command=calculate_interest)
calculate_button.grid(row=3, columnspan=2)

result_label = tk.Label(root, text="")
result_label.grid(row=4, columnspan=2)

root.mainloop()
